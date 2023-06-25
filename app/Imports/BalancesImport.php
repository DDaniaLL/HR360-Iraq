<?php

namespace App\Imports;

use App\Models\Balance;
use App\Models\Leavetype;
use App\Models\User;
use Illuminate\Support\Collection;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class BalancesImport implements ToCollection, WithHeadingRow

{
    function Collection(Collection $rows)
    {
        $leavetypes = Leavetype::all();
        foreach ($rows as $row)
        {
            $user = User::create(
                [
                    'name' => $row['name'],
                    'birth_date' => Date::excelToDateTimeObject($row['birth']),
                    'employee_number' => $row['employee'],
                    'contract' => $row['contract'],
                    'position' => $row['position'],
                    'office' => $row['office'],
                    'department' => $row['department'],
                    'linemanager' => $row['linemanager'],
                    'hradmin' => $row['hradmin'],
                    'superadmin' => $row['superadmin'],
                    'joined_date' => Date::excelToDateTimeObject($row['joined']),
                    'status' => $row['status'],
                    'email' => $row['email'],
                    'usertype_id' => $row['usertype'],
                    'password' => Hash::make('password')
                ]
            );
            foreach ($leavetypes as $leavetype)
            {

                $user->balances()->create(
                    [
                        'name' => $leavetype->name,
                        'value' => $row[$leavetype->name],
                        'leavetype_id' => $leavetype->id,
                    ]
                );
            }
        }
    }


    // public function Model(array $row)
    // {
    //     $users = User::all()->except(1);
    //     $leavetypes = Leavetype::all();
            
                                       
    //                 foreach ($users as $user)
    //                 {
    //                     // if($user->employee_number == $row[0])
    //                     {

    //                         foreach ($leavetypes as $leavetype) {
                
                              
    //                                 $user->balances()->create([
    //                                     'name' => $leavetype->name,
    //                                     'value' => $row['Annual leave'],
    //                                     'leavetype_id' => $leavetype->id,
    //                                 ]);
                                
    //                         }
    //                     }
    //                 }
             
        
        
    // }
}
