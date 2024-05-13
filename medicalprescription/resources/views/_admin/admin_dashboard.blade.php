@extends('_admin.admin_layout')

@section('content')
<div class="">
    <h2>Prescriptions</h2>
    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Image Path</th>
                <th>Notes</th>
                <th>Delivery Address</th>
                <th>Delivery Time</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prescriptions as $prescription)
                <tr>
                    <td>{{ $prescription->patientName }}</td>
                    <td>{{ $prescription->imagePath }}</td>
                    <td>{{ $prescription->notes }}</td>
                    <td>{{ $prescription->deliveryAddress }}</td>
                    <td>{{ $prescription->deliveryTime }}</td>
                    <td>
                    <div>
                    <a href="{{ route('admin.prescription.previewImage', $prescription->imagePath) }}" type="button" class="text-black bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-2xl text-sm px-5 py-2.5 text-center me-2 mb-2">Preview</a>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection