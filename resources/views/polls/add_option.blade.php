<li class="list-group-item">
    <div class="radio">
        <label style="width:100%;">
            <input type="button" data-action="{{ route('poll.addOption', $id) }}" id="add_option" class="btn btn-basic btn-lg" value="&#43;" style="line-height: 3rem;font-size: 5.25rem;">
            <input type="text" id="new_option" class="btn btn-lg btn-default" style="width:90%;" placeholder="add new option">
        </label>
    </div>
</li>
@section('js')
    <script>
        $(document).ready(function($){
            $("form input[type=text]").keypress(function (e) {
                if (e.keyCode == 13) {
                    e.preventDefault();
                    $('#add_option').trigger('click');
                    return false;
                }
            });

            $('#add_option').on('click', function(e) {
                var new_option = $('#new_option').val();
                if (new_option == '') {
                    return $('#new_option').focus();
                }

                $.ajax({
                    url: $(this).data('action'),
                    data: {
                        option: new_option,
                    }
                }).done(function (response) {
                    console.log(response);
                    htmlInput = '<li class="list-group-item"><div class="radio"><label><input value="' + response.id + '" type="' + $("input[name=options]")[0].type + '" name="options[]">' + response.name + '</label> </div></li>';
                    $(htmlInput).insertBefore($('#add_option').parents('li'));
                    $('#new_option').val('');
                });
            });
        });
    </script>
@endsection