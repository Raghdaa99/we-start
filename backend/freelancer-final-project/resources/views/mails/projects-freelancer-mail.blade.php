<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2> Hi {{$freelancer->name}},</h2>
<p>Here are the latest projects matching your skills:</p>
<table>
    <tr>
        <th>PROJECT DESCRIPTION</th>
        <th>BUDGET</th>
    </tr>
    @foreach($freelancer->profile->projects_skills as $project)
        <tr>
            <td>
                <h4>{{$project->title}}</h4>
                <p>{{substr($project->description,0,50)}}...</p>
                <p>
                    skills:
                    @foreach($project->tags as $tag)
                        <span>{{$tag->name}}</span>
                    @endforeach
                </p>
            </td>
            <td>
                <h5>${{$project->min_budget}} - ${{$project->max_budget}}</h5>
                <button>Bid now</button>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
