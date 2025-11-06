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
      max-width: 900px;
      width: 90%;
      margin: 40px 0;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    h1 {
      text-align: center;
      color: #0052cc;
      font-size: 30px;
      margin-bottom: 25px;
      text-transform: uppercase;
    }

    .nav-links {
      text-align: center;
      margin-bottom: 25px;
    }

    .nav-links a {
      background-color: #28a745;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    .nav-links a:hover {
      background-color: #218838;
      transform: scale(1.05);
    }

    .question {
      background-color: #f9f9f9;
      border-left: 5px solid #007bff;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
    }

    .question:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .question h4 {
      margin: 0 0 10px;
      color: #333;
      font-size: 18px;
    }

    .question h5 {
      margin: 5px 0;
      color: #555;
      font-size: 15px;
    }

    .right-answer {
      color: #28a745;
      font-weight: bold;
      margin-top: 8px;
    }

    .actions {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 12px;
      margin-top: 15px;
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

    .no-questions {
      text-align: center;
      color: #666;
      font-style: italic;
      margin-top: 20px;
    }

    .back-button {
      display: inline-block;
      background-color: #ff0000;
      color: white;
      font-weight: bold;
      padding: 10px 25px;
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

    <div class="nav-links">
      <a href="/admin/quizzes/{{ $quiz->id }}/questions/create">+ Add Question</a>
    </div>

    @php $i = 1; @endphp
    @forelse($quiz->questions as $question)
      <div class="question">
        <h4>{{ $i++ }} - {{ $question->title }} ?</h4>
        <h5>({{ $question->choice1 }} - {{ $question->choice2 }} - {{ $question->choice3 }} - {{ $question->choice4 }})</h5>
        <h5 class="right-answer">Right Answer: "{{ $question->right_answer }}"</h5>

        <div class="actions">
          <a href="{{ route('questions.edit', $question) }}"><b>Edit</b></a>
          <form action="{{ route('questions.destroy', $question) }}" method="post" style="display:inline;">
            @csrf
            @method('delete')
            <button type="button" onclick="if(confirm('Are you sure you want to delete this question?')) this.form.submit()">
              <b>Delete</b>
            </button>
          </form>
        </div>
      </div>
    @empty
      <p class="no-questions">No questions added yet for this quiz.</p>
    @endforelse

    <a href="/admin" class="back-button">← Back to Dashboard</a>
  </div>

</body>
</html>
