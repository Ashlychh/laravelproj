<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
        }
        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>SIGN UP FORM</h2>
        <form method="post" action="{{ route('signup.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="serialnum">Email</label>
                <input type="text" name="serialnum" class="form-control" id="serialnum" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="location">Password</label>
                <input type="text" name="location" class="form-control" id="location" placeholder="*******">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    </form>
</body>
</html>
