<form method="POST" action="{{ route('poll.vote', $id) }}" >
    @csrf
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-arrow-right"></span> {{ $question }}
            </h3>
        </div>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            @foreach($options as $oid => $name)
                <li class="list-group-item">
                    <div class="radio">
                        <label>
                            <input value="{{ $oid }}" type="radio" name="options">
                            {{ $name }}
                        </label>
                    </div>
                </li>
            @endforeach
            @include('polls/add_option', compact('id'))
        </ul>
    </div>
    <div class="panel-footer">
        <input type="submit" class="btn btn-primary btn-sm" value="Vote" />
    </div>
</form>
    