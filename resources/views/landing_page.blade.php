<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta Information and Styles -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

  <title>Charity Landing Page</title>
  <!-- TailwindCSS for styling -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome for icons -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <style>
    /* Custom Styles */
    .nav-link {
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      margin: 0 15px;
      font-size: 18px;
    }
    .nav-link:hover {
      color: #ffffff;
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Main Content -->
  <main>
    <!-- Hero Section -->
    <section 
    class="relative text-center h-[80vh] bg-cover bg-center text-white flex flex-col justify-center items-center mb-[20px]"
    style="background-image: url('{{ asset('images/bg.png') }}');">
    <!-- Content goes here -->
      <!-- Navigation Menu -->
      <header class="absolute top-0 left-0 right-0">
        <div class="container mx-auto flex justify-between items-center">
          <!-- Logo -->
          <div>
            <a href="{{ route('admin.login') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Charity Logo" class="h-[180px] w-auto">
            </a>
        </div>
        
          <!-- Navigation Links -->
          <nav class="space-x-6 mb-[50px]">
            <a href="#" class="nav-link">Home</a>
            <a href="#" class="nav-link">About Us</a>
            <a href="#" class="nav-link">Programs</a>
            <a href="#" class="nav-link">Donate</a>
          </nav>
        </div>
      </header>

      <!-- Hero Text -->
      <div class="z-10">
        <h1 class="text-4xl font-bold mb-4">Make a Difference Today</h1>
        <p class="mb-6">
          Join us in creating a brighter future for those in need. Every contribution matters.
        </p>
        <a href="{{ route('donations.create') }}" class="bg-yellow-500 text-white py-2 px-4 rounded">Donate Now</a>
      </div>
    </section>

    <!-- About Section -->
    <section class="h-[400px] flex justify-center items-center bg-white">
      <div class="p-12 rounded-lg text-center">
        <h2 class="text-5xl font-bold mb-6 text-black">Our Mission</h2>
        <p class="text-2xl text-gray-600 w-[550px]">
          We are dedicated to empowering individuals and communities by providing resources, education, and support to improve lives and create opportunities.
        </p>
      </div>
    </section>
    
    
   
   <!-- Programs Section -->
   <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12 bg-gray-100 ">
    <!-- Food Distribution Program -->
    <div class="bg-gray-100 p-6 rounded-lg text-center">
      <img src="{{ asset('images/photo1.jpg') }}" alt="Food Program" class="mx-auto mb-6 w-full h-[400px] object-cover rounded">
      <h3 class="text-3xl font-bold mb-4">Food Distribution</h3>
      <p class="text-lg text-gray-700">Providing meals to underprivileged families and individuals.</p>
    </div>
    
    <!-- Education Support Program -->
    <div class="bg-gray-100 p-6 rounded-lg text-center">
      <img src="{{ asset('images/photo3.jpg') }}" alt="Education Program" class="mx-auto mb-6 w-full h-[400px] object-cover rounded">
      <h3 class="text-3xl font-bold mb-4">Education Support</h3>
      <p class="text-lg text-gray-700">Ensuring access to quality education for children and youth.</p>
    </div>
    
    <!-- Healthcare Access Program -->
    <div class="bg-gray-100 p-6 rounded-lg text-center">
      <img src="{{ asset('images/photo2.jpg') }}" alt="Healthcare Program" class="mx-auto mb-6 w-full h-[400px] object-cover rounded">
      <h3 class="text-3xl font-bold mb-4">Healthcare Access</h3>
      <p class="text-lg text-gray-700">Providing essential healthcare services to remote areas.</p>
    </div>
  </section>

     
      <!-- Social Proof Section -->
      <section class="bg-white-200 p-16 rounded-lg text-center mb-12">
        <h2 class="text-3xl font-bold mb-6">What People Say</h2> <!-- Increased font size for h2 -->
        <p class="text-gray-600 mb-6 text-xl">"Thanks to this charity, I now have the resources to pursue my education and achieve my dreams." – Jane Doe</p> <!-- Increased font size for p -->
        <p class="text-gray-600 text-xl">"Their support has been life-changing for my family." – John Smith</p> <!-- Increased font size for p -->
      </section>


    <!-- Extras Section -->
    <section class="text-center py-20 bg-white">
      <h2 class="text-4xl font-bold mb-6">See Our Work</h2>
      <p class="text-gray-600 text-xl mb-8">Explore images and videos of our recent projects and events.</p>
      <button class="bg-yellow-500 text-white py-3 px-6 rounded-2xl text-xl">View Gallery</button>
    </section>
    
    

  <!-- Footer Section -->
  <footer class="bg-gray-200 shadow-md py-10 h-[300px] pt-[100px]"> <!-- Increased padding (py-12) and height (h-[400px]) -->
    <div class="container mx-auto flex justify-between items-center px-6">
      <!-- Footer Links -->
      <div class="space-y-2">
        <a href="#" class="text-gray-600 font-bold :text-gray-800 block text-lg">Get Involved</a>
        <a href="#" class="text-gray-600  font-bold  hover:text-gray-800 block text-lg">Volunteer</a>
        <a href="#" class="text-gray-600  font-bold  hover:text-gray-800 block text-lg">Contact Us</a>
      </div>
      <!-- Footer Branding (Image Logo) -->
      <div>
        <img src="{{ asset('images/logo2.png') }}" alt="Charity Logo" class="h-[100px] w-auto">
      </div>
      <!-- Footer Social Media Links -->
      <div class="space-y-2">
        <a href="#" class="text-gray-600 hover:text-gray-800 block text-2xl">
          <i class="fab fa-facebook-square"></i> <!-- Facebook Icon -->
        </a>
        <a href="#" class="text-gray-600 hover:text-gray-800 block text-2xl">
          <i class="fab fa-twitter-square"></i> <!-- Twitter Icon -->
        </a>
        <a href="#" class="text-gray-600 hover:text-gray-800 block text-2xl">
          <i class="fab fa-instagram"></i> <!-- Instagram Icon -->
        </a>
      </div>
    </div>
  </footer>
  
  
</body>
</html>