<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Imports;

use App\Models\AddVariant;
use App\Models\AllProduct;
use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Auth;
use Session;
class ProductsImport implements ToCollection, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Skip the first row and start from the second row
    }
    public function collection(Collection $rows)
    {
        // dd($rows);
        foreach ($rows as $index => $row) {
            // Ensure there are enough columns in the row
            if (count($row) < 11) {
                continue;
            }
            $galleryImagesArray = [];
            for ($i = 6; $i <= 9; $i++) {
                if (isset($row[$i]) && !empty(trim($row[$i]))) {
                    $galleryImagesArray[] = trim($row[$i]);
                }
            }
            $galleryImages = json_encode($galleryImagesArray);
            $productname = isset($row[0]) ? trim($row[0]) : '';
            $category = isset($row[1]) ? trim($row[1]) : '';
            $regularprice = isset($row[2]) ? trim($row[2]) : '';
            $saleprice = isset($row[3]) ? trim($row[3]) : '';
            $description = isset($row[4]) ? trim($row[4]) : '';
            $thumbnailImages = isset($row[5]) ? trim($row[5]) : '';
            $productstatus = isset($row[10]) ? trim($row[10]) : '';
            
            $missingFields = [];
            if (empty($productname)) $missingFields[] = 'Product Name';
            if (empty($category)) $missingFields[] = 'Category';
            if (empty($regularprice)) $missingFields[] = 'Regular Price';
            if (empty($saleprice)) $missingFields[] = 'Sale Price';
            
            // Validation checks
            if (!empty($missingFields)) {
                $errors[] = "Row " . ($index + 2) . " is missing: " . implode(', ', $missingFields) . " field";
                continue;
            }

            // Save data to the database
            $data = AllProduct::updateOrCreate(
                ['productname' => $productname], // The criteria to search for duplicates in productname
                [
                    'category' => $category,
                    'regularprice' => $regularprice,
                    'saleprice' => $saleprice,
                    'description' => $description,
                    'galleryImages' => $galleryImages,
                    'thumbnailImages' => $thumbnailImages,
                    'productstatus' => $productstatus ?? 'unpublished',
                ]
            );
            //dd($data);
        }
         //If there are errors, return them to the session and stop the import
         if (!empty($errors)) {
            Session::flash('error', implode('<br>', $errors));
            return redirect()->back();
        }
    }

}
