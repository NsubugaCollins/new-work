<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit School</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit School</h2>

        <form action="{{ route('schools.update', $school->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">School Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $school->name }}" required>
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" class="form-control" name="district" id="district" value="{{ $school->district }}" required>
            </div>
            <div class="form-group">
                <label for="school_registration_number">school_registration_number</label>
                <input type="text" class="form-control" name="school_registration_number" id="school_registration_number" value="{{ $school->registration_number }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email of Representative</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $school->email }}" required>
            </div>
            <div class="form-group">
                <label for="representative_name">Representative Name</label>
                <input type="text" class="form-control" name="representative_name" id="representative_name" value="{{ $school->representative_name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>