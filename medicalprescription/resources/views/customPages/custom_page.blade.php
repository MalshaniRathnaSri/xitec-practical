@extends('layout')

@section('content')
<div class="custom_container">
<div class="max-w-md mx-auto bg-white shadow-md rounded-md p-6">

  <h2 class="text-xl font-semibold mb-4">Prescription Upload Form</h2>

  <form id="uploadForm">

    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700">Upload Prescription:</label>
      <input type="file" name="prescription" id="prescription" multiple accept="image/*" class="mt-1 px-3 py-2 border border-gray-300 rounded-md block w-full">
      <div id="imagePreview" class="mt-2 flex flex-wrap gap-4"></div>
    </div>

    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700">Additional Notes:</label>
      <textarea name="notes" rows="3" class="mt-1 px-3 py-2 border border-gray-300 rounded-md block w-full"></textarea>
    </div>

    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700">Delivery Address:</label>
      <input type="text" name="address" class="mt-1 px-3 py-2 border border-gray-300 rounded-md block w-full">
    </div>

    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700">Delivery Time:</label>
      <select name="delivery-time" class="mt-1 px-3 py-2 border border-gray-300 rounded-md block w-full">
        <option>Select a time slot</option>
        <option>10:00 AM - 12:00 PM</option>
        <option>12:00 PM - 2:00 PM</option>
        <option>2:00 PM - 4:00 PM</option>
      </select>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>

  </form>

</div>

<script>
  document.getElementById('prescription').addEventListener('change', function(event) {
    var files = event.target.files;
    var previewContainer = document.getElementById('imagePreview');
    var maxFiles = 5;
    var currentFilesCount = previewContainer.childElementCount;

    if (currentFilesCount + files.length > maxFiles) {
      alert('You can upload a maximum of 5 images.');
      event.target.value = ''; 
      return;
    }

    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      var reader = new FileReader();

      reader.onload = function(e) {
        var image = document.createElement('img');
        image.src = e.target.result;
        image.classList.add('w-24', 'h-24', 'object-cover', 'rounded-md', 'mr-2', 'mb-2');
        previewContainer.appendChild(image);
      };

      reader.readAsDataURL(file);
    }
  });

  document.getElementById('uploadForm').addEventListener('submit', function(event) {
    var fileInput = document.getElementById('prescription');
    if (fileInput.files.length > 5) {
      alert('You can upload a maximum of 5 images.');
      event.preventDefault();
    }
  });
</script>




</div>
@endsection