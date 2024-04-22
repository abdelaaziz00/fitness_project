<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exercise</title>
</head>
<body>
    <h2>Add Exercise</h2>
    <form action="add_exercise.php" method="post">
        <!-- Assuming you have fields for video_name, video_id, and idmuscle -->
        <input type="hidden" name="video_name" value="Video Name">
        <input type="hidden" name="video_id" value="123"> <!-- Example video ID -->
        <input type="hidden" name="idmuscle" value="777"> <!-- Example muscle ID -->

        <!-- Other exercise-related fields can be added here -->
        
        <button type="submit">Add Exercise</button>
    </form>
</body>
</html>