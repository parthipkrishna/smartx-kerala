@extends('student-dashboard.layouts.dashboard')

@section('preview-marklist')
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="width: 50%; padding: 20px; text-align: center; border: 1px solid #ddd; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: red; margin-bottom: 10px;">No Mark List Available</h2>
        <p style="font-size: 18px; color: #555;">The mark list for this student is not available.</p>
        <p style="font-size: 16px; color: #777;">Please contact your institute for more details.</p>
    </div>
</div>
@endsection