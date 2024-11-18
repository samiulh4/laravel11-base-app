<?php

namespace App\Modules\Document\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SplFileObject;
use Exception;
use PhpParser\Node\Scalar\MagicConst\Dir;
use Illuminate\Support\Facades\File;
use App\Modules\Document\Services\DocumentService;

class DocumentUploadController
{
    protected $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    public function uploadFile()
    {
        return view("Document::pages.upload-file");
    }

    public function uploadFileStore(Request $request)
    {
        $request->validate([
            'upload_file' => 'required|mimes:csv,txt|max:2048'
        ]);
        try {
            $file = $request->file('upload_file');
            $destinationPath = public_path('uploads' . DIRECTORY_SEPARATOR . 'csv_uploads');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, 'uploaded_file.csv');
            $this->documentService->processCsvInChunkBySpl($destinationPath . DIRECTORY_SEPARATOR . 'uploaded_file.csv');
            session()->flash('success', 'CSV Import added on queue. will update you once done.');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    } // End uploadFileStore()

    private function processCsv($filePath)
    {
        $csv = new SplFileObject($filePath);
        $csv->setFlags(SplFileObject::READ_CSV);

        // Chunk size to read the file
        $chunkSize = 1000;
        $chunk = [];

        foreach ($csv as $row) {
            if (!empty($row)) {
                $chunk[] = $row;

                if (count($chunk) >= $chunkSize) {
                    $this->processChunk($chunk);
                    $chunk = []; // Reset chunk
                }
            }
        }

        // Process any remaining rows
        if (count($chunk) > 0) {
            $this->processChunk($chunk);
        }

        // Optionally, delete the file after processing
        //unlink($filePath);
    }
    private function processChunk($chunk)
    {
        // Process the chunk of CSV rows
        foreach ($chunk as $row) {
            // Your logic for processing each row
            // For example, save to the database:
            // DB::table('your_table')->insert([
            //     'column1' => $row[0],
            //     'column2' => $row[1],
            // ]);
        }
    }
    public function processCsvInChunks($filePath, $chunkSize = 1000)
    {
        $header = null;
        $rowCounter = 0;
        $chunk = [];

        if (($handle = fopen($filePath, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (!$header) {
                    $header = $row; // Save the header row
                    continue;
                }

                $chunk[] = array_combine($header, $row); // Map each row with header as keys

                if (++$rowCounter % $chunkSize === 0) {
                    ProcessCsvChunk::dispatch($chunk);
                    $chunk = []; // Reset chunk
                }
            }

            // Dispatch remaining rows if any
            if (!empty($chunk)) {
                ProcessCsvChunk::dispatch($chunk);
            }

            fclose($handle);
        }
    }
}
