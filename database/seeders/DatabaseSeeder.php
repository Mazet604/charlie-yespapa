<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed emp_acc table with first entry
        DB::table('emp_acc')->insert([
            'empid' => '11-0070',
            'empuser' => 'jgmatugas',
            'emppass' => Hash::make('matugas@2023'),
            'empmail' => 'jgmatugas117@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed emp_acc table with second entry
        DB::table('emp_acc')->insert([
            'empid' => '11-0071',
            'empuser' => 'tdadlawan',
            'emppass' => Hash::make('adlawan@2023'),
            'empmail' => 'adlawan117@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed employee table for 11-0070 and get the emp_count
        $employeeId1 = DB::table('employee')->insertGetId([
            'empid' => '11-0070',
            'emp_fname' => 'Janelle',
            'emp_mname' => 'G.',
            'emp_lname' => 'Matugas',
            'emp_dob' => '1985-05-15',
            'emp_pob' => 'Davao City',
            'emp_position' => 'HRMDD Head',
            'emp_height' => 5.8,
            'emp_weight' => 75,
            'emp_cnum' => 1234567891,
            'emp_civ_stat' => 'Married',
            'emp_citizen' => 'Filipino',
            'emp_idlicense' => 'ID654321',
            'emp_idplace' => 'City',
            'emp_iduse' => 'Personal',
            'emp_iddate' => '2005-01-01',
            'emp_telnum' => 98765432,
            'emp_religion' => 'Roman Catholic',
            'emp_age' => 38,
            'emp_sex' => 'Female',
            'emp_blood' => 'B',
            'User_type' => 1,
            'esignature' => 'signature1.png',
            'emp_disability' => 'No',
            'emp_ip' => 'No',
            'emp_pwd' => 'N/A',
            'emp_ip_group' => 'N/A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed employee table for 11-0071 and get the emp_count
        $employeeId2 = DB::table('employee')->insertGetId([
            'empid' => '11-0071',
            'emp_fname' => 'Teddygardo',
            'emp_mname' => 'B.',
            'emp_lname' => 'Adlawan',
            'emp_ext' => 'Jr.',
            'emp_dob' => '1989-12-20',
            'emp_pob' => 'Davao City',
            'emp_position' => 'Administrative Assistant II',
            'emp_height' => 5.9,
            'emp_weight' => 70,
            'emp_cnum' => 1234567890,
            'emp_civ_stat' => 'Widowed',
            'emp_citizen' => 'Filipino',
            'emp_idlicense' => 'ID123456',
            'emp_idplace' => 'City',
            'emp_iduse' => 'Personal',
            'emp_iddate' => '2010-01-01',
            'emp_telnum' => 98765432,
            'emp_religion' => 'Roman Catholic',
            'emp_age' => 30,
            'emp_sex' => 'Male',
            'emp_blood' => 'A',
            'User_type' => 1,
            'esignature' => 'signature.png',
            'emp_disability' => 'No',
            'emp_ip' => 'No',
            'emp_pwd' => 'N/A',
            'emp_ip_group' => 'N/A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed emp_address table for 11-0070
        DB::table('emp_address')->insert([
            'emp_count' => $employeeId1,
            'emp_house' => '#45',
            'emp_street' => 'Sunset Blvd',
            'emp_subd' => 'Golden Village',
            'emp_brgy' => 'Brgy. Matina Crossing',
            'emp_city' => 'Davao City',
            'emp_prov' => 'Davao Del Sur',
            'emp_region' => 'REGION XI',
            'emp_country' => 'Philippines',
            'emp_zip' => '8000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed emp_address table for 11-0071
        DB::table('emp_address')->insert([
            'emp_count' => $employeeId2,
            'emp_house' => '#23',
            'emp_street' => 'Sta. Rita St.',
            'emp_subd' => 'Pagasa Village',
            'emp_brgy' => 'Brgy. Matina Aplaya',
            'emp_city' => 'Davao City',
            'emp_prov' => 'Davao Del Sur',
            'emp_region' => 'REGION XI',
            'emp_country' => 'Philippines',
            'emp_zip' => '8000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}