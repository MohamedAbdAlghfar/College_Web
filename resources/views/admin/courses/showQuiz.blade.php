<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->name }} Quiz</title>
    <style>
        body {
            background-color: black;
            color: yellow;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            color: yellow;
            text-decoration: none;
            margin-bottom: 10px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }

        .add-question-link {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .question {
            margin-bottom: 20px;
            border: 1px solid yellow;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .question h4 {
            margin: 0;
            font-size: 18px;
        }

        .question h5 {
            margin: 5px 0;
            font-size: 16px;
        }

        .right-answer {
            color: #4CAF50;
        }

        .actions {
            display: flex;
            justify-content: space-between;
        }

        .actions button {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .actions button:hover {
            background-color: #d32f2f;
        }
        .back-button {
  background-color: red; 
  color: white;
  border: 1px solid black;
  padding: 5px 10px;
  font-size: 16px;
  text-decoration: none;
  cursor: pointer;
} 

    </style>
</head>
<body>

<div class="container">
    <h1>{{ $quiz->name }} Quiz</h1>
   
    <a href="/admin/quizzes/{{ $quiz->id }}/questions/create" class="add-question-link">Add Question</a>
    <?php $i = 1 ; ?> 
    @foreach($quiz->questions as $question) 
      
     <div class="question">
  
            <h4> <?php echo $i ; ?> - {{ $question->title }} ?</h4> <?php $i++ ; ?>
            <h5>({{ $question->choice1}} - {{$question->choice2 }} - {{$question->choice3 }} - {{$question->choice4 }})</h5>
            <h5 class="right-answer">RIGHT ANSWER IS: "{{ $question->right_answer }}"</h5>

            <div class="actions"> 
                <form action="{{ route('questions.destroy', $question) }}" method="post">
                    @csrf
                    @method('delete')

                    <a href="{{ route('questions.edit', $question) }}">Edit</a>
                    <button type="button" onclick="confirm('Are you sure you want to delete this question?') ? this.parentElement.submit() : ''">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    @endforeach 
</div>
<a href="{{ route('courses.show', $course) }}" class="back-button">BACK</a>
</body>
</html>
