<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add School</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Add New School</h2>

        <form action="{{ route('schools.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">School Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" class="form-control" name="district" id="district" required>
            </div>
            <div class="form-group">
                <label for="school_registration_number">School_registration_number</label>
                <input type="text" class="form-control" name="school_registration_number" id="school_registration_number" required>
            </div>
            <div class="form-group">
                <label for="email">Email of Representative</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="representative_name">Representative Name</label>
                <input type="text" class="form-control" name="representative_name" id="representative_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>