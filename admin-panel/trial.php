<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Blog Post Form</title>
    <link rel="stylesheet" href="assets/plugins/dropify/css/dropify.min.css">
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="assets/plugins/summernote/dist/summernote.css"/>

</head>
<body>

<h2>Create a New Blog Post</h2>

<form method="post" enctype="multipart/form-data" action="submit_blog.php">
    <label for="title">Blog Title:</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required><br><br>

    <label for="image">Choose Image:</label>
    <input type="file" id="image" name="image" required><br><br>

    <label for="category">Category:</label>
    <select id="category" name="category" required>
        <option value="">Select Category</option>
        <option value="consultation">Consultation</option>
        <option value="indoor_admission_voluntary">Indoor Admission - Voluntarily</option>
        <option value="detoxification">Detoxification</option>
        <!-- Add other categories as needed -->
    </select><br><br>

    <label for="content">Content:</label><br>
    <div class="summernote" name="content" id="content">
                               
                            </div>

    <button type="submit">Submit</button>
</form>
<script src="assets/plugins/summernote/dist/summernote.js"></script>
<script src="assets/plugins/dropify/js/dropify.min.js"></script>
<script src="assets/js/pages/forms/dropify.js"></script>
</body>
</html>
