<?php

namespace App\Modules\Document\Services;

use SplFileObject;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Modules\Document\Models\ChunkUpload;
use App\Jobs\ProcessCsvChunk;

class DocumentService
{
    public function processCsvInChunkBySpl($filePath, $chunkSize = 500) : void
    {
        $csv = new SplFileObject($filePath);
        $csv->setFlags(SplFileObject::READ_CSV);

        $chunk = [];

        foreach ($csv as $row) {
            if (!empty($row)) {
                $chunk[] = $row;
                if (count($chunk) >= $chunkSize) {
                    $this->processChunk($chunk);
                    $chunk = [];
                }
            }
        }
        if (!empty($chunk)) {
            $this->processChunk($chunk);
        }
        unlink($filePath);
    }// End processCsvInChunk()

    public function processChunk($chunk)
    {
        $insertData = [];

        foreach ($chunk as $row) {
            $insertData[] = [
                'customer_Id'       => $row[1] ?? null,
                'first_name'        => $row[2] ?? null,
                'last_name'         => $row[3] ?? null,
                'company_city'      => $row[4] ?? null,
                'country'           => $row[5] ?? null,
                'phone_1'           => $row[6] ?? null,
                'phone_2'           => $row[7] ?? null,
                'email'             => $row[8] ?? null,
                'subscription_date' => $row[9] ?? null,
                'website'           => $row[10] ?? null,
                'created_by'        => Auth::user()->id,
                'updated_by'        => Auth::user()->id,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ];
        }
        ProcessCsvChunk::dispatch($insertData);
    }// End processChunk()
}// End DocumentService
