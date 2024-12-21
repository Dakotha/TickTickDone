<!DOCTYPE html>
<html>
<head>
    <title>Task Reminder</title>
</head>
<body>
    <h1>Reminder: Task Deadline</h1>
    <p>Dear {{ $task->user->name }},</p>
    <p>This is a reminder for your task:</p>
    <ul>
        <li><strong>Task:</strong> {{ $task->name }}</li>
        <li><strong>Due Date:</strong> {{ $task->due_date->format('Y-m-d') }}</li>
        <li><strong>Priority:</strong> {{ ucfirst($task->priority) }}</li>
    </ul>
    <p>Please ensure you complete the task on time.</p>
</body>
</html>
