<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Optional: Add custom styles for smooth transitions */
    .transition-all {
      transition: all 0.3s ease;
    }
  </style>
</head>

<body class="min-h-screen flex">

  <!-- Left Side (Form) -->
  <div class="w-full sm:w-1/2 bg-white flex flex-col justify-center items-center px-8 py-10">
    <div class="w-full max-w-md">
      <div class="text-center mb-4">
      </div>
      <h1 class="text-3xl font-bold mb-6 text-center">Create an Account</h1>

      <form method="POST" action="{{ route('register') }}">
        @csrf
      
        <!-- Full Name Field -->
        <div class="mb-4">
          <label for="username" class="block text-gray-700 mb-1">Username</label>
          <input type="text" name="username" id="username" class="w-full border border-gray-300 rounded-md px-4 py-2 transition-all focus:outline-none focus:ring-2 focus:ring-blue-600" required placeholder="Your Name" />
        </div>
      
        <!-- Email Field -->
        <div class="mb-4">
          <label for="email" class="block text-gray-700 mb-1">Email Address</label>
          <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md px-4 py-2 transition-all focus:outline-none focus:ring-2 focus:ring-blue-600" required placeholder="Email Address" />
        </div>
      
        <!-- Gender Field -->
        <div class="mb-4">
          <label for="gender" class="block text-gray-700 mb-1">Gender</label>
          <select name="gender" id="gender" class="w-full border border-gray-300 rounded-md px-4 py-2 transition-all focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="Laki-laki">Male</option>
            <option value="Perempuan">Female</option>
          </select>
        </div>
      
        <!-- Phone Number Field -->
        <div class="mb-4">
          <label for="phone_number" class="block text-gray-700 mb-1">Phone Number</label>
          <input type="tel" name="phone_number" id="phone_number" class="w-full border border-gray-300 rounded-md px-4 py-2 transition-all focus:outline-none focus:ring-2 focus:ring-blue-600" required placeholder="Phone Number" />
        </div>
      
        <!-- Password Field -->
        <div class="mb-4">
          <label for="password" class="block text-gray-700 mb-1">Password</label>
          <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-md px-4 py-2 transition-all focus:outline-none focus:ring-2 focus:ring-blue-600" required placeholder="Enter Your Password" />
        </div>
      
        <!-- Password Confirmation Field -->
        <div class="mb-6">
          <label for="password_confirmation" class="block text-gray-700 mb-1">Confirm Password</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-gray-300 rounded-md px-4 py-2 transition-all focus:outline-none focus:ring-2 focus:ring-blue-600" required placeholder="Confirm Your Password" />
        </div>
      
        <!-- Submit Button -->
        <button type="submit" class="w-full bg-[#6E24FF] text-white px-4 py-2 rounded-md hover:bg-[#4A1AB0] transition-all">
          Register
        </button>
 

        <!-- Login Link -->
        <div class="mt-6 text-center">
          <p>Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here.</a></p>
        </div>
      </form>
    </div>
  </div>

<!-- Right Side (Image/Illustration) -->
<div class="w-1/2 bg-gradient-to-br from-[#6E24FF] to-purple-300 text-white flex flex-col justify-center items-center p-10">
    <div class="mb-2">
      <a href="{{ url('/') }}">
        <img src="/images/user/logo/logoo.png" alt="Logo" class="w-52 h-12 mx-auto mt-2">
      </a>
    </div>
    <img src="/images/login1.svg" alt="Illustration" class="w-[32rem] h-[32rem] object-contain -mt-4" />
  </div>
  

</body>

</html>
