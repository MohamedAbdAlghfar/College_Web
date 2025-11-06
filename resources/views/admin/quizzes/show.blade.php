<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $quiz->name }} Quiz</title>
  <style>
    body {
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #0052cc, #007bff);
      color: #222;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .container {
      background-color: #fff;
      max-width: 850px;
      width: 90%;
      margin: 40px 0;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    h1 {
      text-align: center;
      color: #0052cc;
      font-size: 28px;
      margin-bottom: 25px;
    }

    .add-question-link {
      display: inline-block;
      background-color: #28a745;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
      margin-bottom: 25px;
    }

    .add-question-link:hover {
      background-color: #218838;
      transform: scale(1.05);
    }

    .question {
      background-color: #f9f9f9;
      border-left: 5px solid #007bff;
      border-radius: 10px;
      padding: 15px 20px;
      margin-bottom: 20px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .question h4 {
      margin: 0 0 8px;
      color: #333;
      font-size: 18px;
    }

    .question h5 {
      margin: 5px 0;
      color: #555;
    }

    .right-answer {
      color: #28a745;
      font-weight: bold;
    }

    .actions {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 15px;
      margin-top: 10px;
    }

    .actions a {
      background-color: #007bff;
      color: white;
      padding: 6px 14px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    .actions a:hover {
      background-color: #0056b3;
    }

    .actions button {
      background-color: #dc3545;
      color: white;
      padding: 6px 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }

    .actions button:hover {
      background-color: #b02a37;
    }

    .back-button {
      display: inline-block;
      background-color: #ff0000;
      color: white;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      margin-bottom: 40px;
      transition: 0.3s;
    }

    .back-button:hover {
      background-color: #cc0000;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>{{ $quiz->name }} Quiz</h1>

    <a href="/admin/quizzes/{{ $quiz->id }}/questions/create" class="add-question-link">Add Question</a>

    <?php $i = 1; ?>
    @foreach($quiz->questions as $question)
      <div class="question">
        <h4><?php echo $i; ?> - {{ $question->title }} ?</h4> <?php $i++; ?>
        <h5>({{ $question->choice1 }} - {{ $question->choice2 }} - {{ $question->choice3 }} - {{ $question->choice4 }})</h5>
        <h5 class="right-answer">RIGHT ANSWER IS: "{{ $question->right_answer }}"</h5>

        <div class="actions">
          <a href="{{ route('questions.edit', $question) }}"><b>Edit</b></a>
          <form action="{{ route('questions.destroy', $question) }}" method="post" style="display:inline;">
            @csrf
            @method('delete')
            <button type="button" onclick="confirm('Are you sure you want to delete this question?') ? this.parentElement.submit() : ''">
              <b>Delete</b>
            </button>
          </form>
        </div>
      </div>
    @endforeach
  </div>

  <a href="/admin" class="back-button">BACK</a>

</body>
</html>
