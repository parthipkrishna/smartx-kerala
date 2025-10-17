@extends('layouts.dashboard')
@section('view-certificate-theme') 

    <div class="pdf-container">
        <div class="pdf-card mt-3" onclick="openPDF()">
            <img src="{{ asset('pdf/pdf.png') }}" alt="PDF Icon" class="pdf-icon"> 
        </div>
        <span class="pdf-title">Certificates.pdf</span>
        <div class="pdf-card mt-3" onclick="openPDF2()">
            <img src="{{ asset('pdf/pdf.png') }}" alt="PDF Icon" class="pdf-icon"> 
        </div>
        <span class="pdf-title">Certificates.pdf</span></style>
    </div>

    <style>
        .pdf-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 200px; /* Keep container size consistent */
        }

        .pdf-card {
            width: 200px;
            height: 200px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            cursor: pointer;
            background-color: #f8f9fa;
            transition: 0.3s;
            overflow: hidden;
        }

        .pdf-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .pdf-icon {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Cover entire card */
        }

        .pdf-title {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }
    </style>

    <script>
        function openPDF() {
            window.open("{{ asset('pdf/certificate1.pdf') }}", "_blank");
        }
    </script>
    <script>
        function openPDF2() {
            window.open("{{ asset('pdf/certificate2.pdf') }}", "_blank");
        }
    </script>

@endsection
