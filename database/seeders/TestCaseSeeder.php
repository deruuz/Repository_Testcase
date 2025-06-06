<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\TestCase;

class TestCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TestCase::create([
            'position' => 1,
            'nomor' => 1,
            'kategori_id' => 1,  // Pastikan kategori_id sesuai dengan data kategori yang ada
            'type_id' => 1,      // Pastikan type_id sesuai dengan data type yang ada
            'nama_test_case' => 'Login Test Case',
            'steps' => 'Step 1: Open login page, Step 2: Enter credentials, Step 3: Click login button',
            'test_data' => 'Username: test, Password: test123',
            'expected_result' => 'User successfully logged in',
            'case_type' => 'positive',
            'admin_status' => 'created',
            'priority' => 'high',
            'tags' => [1, 2], // login dan authentication
        ]);
        
        TestCase::create([
              'position' => 2,
            'nomor' => 2,
            'kategori_id' => 1,  // Pastikan kategori_id sesuai dengan data kategori yang ada
            'type_id' => 2,      // Pastikan type_id sesuai dengan data type yang ada
            'nama_test_case' => 'Forgot Password Test Case',
            'steps' => 'Step 1: Open forgot password page, Step 2: Enter email, Step 3: Click reset password button',
            'test_data' => 'Email: test@example.com',
            'expected_result' => 'Password reset email sent',
            'case_type' => 'positive',
            'admin_status' => 'created',
            'priority' => 'medium',
                'tags' => [1, 3], // login dan authentication
        ]);

        TestCase::create([
              'position' => 3,
            'nomor' => 3,
            'kategori_id' => 2,
            'type_id' => 3,
            'nama_test_case' => 'Register User Test Case',
            'steps' => 'Step 1: Open registration page, Step 2: Enter user details, Step 3: Submit registration form',
            'test_data' => 'Username: user123, Email: user@example.com, Password: password123',
            'expected_result' => 'User successfully registered',
            'case_type' => 'positive',
            'admin_status' => 'created',
            'priority' => 'high',
                'tags' => [2, 3], // login dan authentication
        ]);

        TestCase::create([
              'position' => 4,
            'nomor' => 4,
            'kategori_id' => 3,
            'type_id' => 4,
            'nama_test_case' => 'Logout Test Case',
            'steps' => 'Step 1: Click on logout button, Step 2: Verify user is logged out',
            'test_data' => 'N/A',
            'expected_result' => 'User successfully logged out',
            'case_type' => 'positive',
            'admin_status' => 'created',
            'priority' => 'medium',
               'tags' => [2, 1], // login dan authentication
        ]);

        TestCase::create([
              'position' => 5,
            'nomor' => 5,
            'kategori_id' => 4,
            'type_id' => 1,
            'nama_test_case' => 'Invalid Login Test Case',
            'steps' => 'Step 1: Open login page, Step 2: Enter invalid credentials, Step 3: Click login button',
            'test_data' => 'Username: wronguser, Password: wrongpass',
            'expected_result' => 'Login fails, error message displayed',
            'case_type' => 'negative',
            'admin_status' => 'created',
            'priority' => 'critical',
                'tags' => [3, 4], // login dan authentication
        ]);

        TestCase::create([
              'position' => 6,
            'nomor' => 6,
            'kategori_id' => 1,
            'type_id' => 2,
            'nama_test_case' => 'Forgot Password with Invalid Email Test Case',
            'steps' => 'Step 1: Open forgot password page, Step 2: Enter invalid email, Step 3: Click reset password button',
            'test_data' => 'Email: invalidemail@example.com',
            'expected_result' => 'Error message displayed: "Email not found"',
            'case_type' => 'negative',
            'admin_status' => 'created',
            'priority' => 'high',
                'tags' => [1, 4], // login dan authentication
        ]);

        TestCase::create([
              'position' => 7,
            'nomor' => 7,
            'kategori_id' => 2,
            'type_id' => 3,
            'nama_test_case' => 'Password Reset Test Case',
            'steps' => 'Step 1: Open reset password page, Step 2: Enter new password, Step 3: Submit',
            'test_data' => 'New Password: newpassword123',
            'expected_result' => 'Password successfully reset',
            'case_type' => 'positive',
            'admin_status' => 'created',
            'priority' => 'medium',
                'tags' => [2, 4], // login dan authentication
        ]);

        TestCase::create([
              'position' => 8,
            'nomor' => 8,
            'kategori_id' => 3,
            'type_id' => 1,
            'nama_test_case' => 'Account Verification Email Test Case',
            'steps' => 'Step 1: Open account verification email, Step 2: Click on verification link',
            'test_data' => 'N/A',
            'expected_result' => 'Account successfully verified',
            'case_type' => 'positive',
            'admin_status' => 'created',
            'priority' => 'low',
                'tags' => [3, 4], // login dan authentication
        ]);

        TestCase::create([
              'position' => 9,
            'nomor' => 9,
            'kategori_id' => 4,
            'type_id' => 2,
            'nama_test_case' => 'Invalid Password Reset Request Test Case',
            'steps' => 'Step 1: Open reset password page, Step 2: Enter invalid token, Step 3: Submit reset form',
            'test_data' => 'Token: invalidtoken',
            'expected_result' => 'Error message displayed: "Invalid token"',
            'case_type' => 'negative',
            'admin_status' => 'created',
            'priority' => 'high',
                'tags' => [1, 5], // login dan authentication
        ]);

        TestCase::create([
              'position' => 10,
            'nomor' => 10,
            'kategori_id' => 3,
            'type_id' => 4,
            'nama_test_case' => 'Profile Update Test Case',
            'steps' => 'Step 1: Open profile page, Step 2: Update profile information, Step 3: Save changes',
            'test_data' => 'Username: user123, Bio: "This is a test bio"',
            'expected_result' => 'Profile successfully updated',
            'case_type' => 'positive',
            'admin_status' => 'created',
            'priority' => 'medium',
                'tags' => [4, 5], // login dan authentication
        ]);
    }
}
