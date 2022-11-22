$(document).ready(function(){
    $('.center input').keyup(function(){
        var words = $('input').val();

        if(words != ''){
            //realizando uma busca no banco de dados se a var words não tiver vazio
            $.ajax({
                'url': 'search.php',
                'method': 'GET',
                'dataType': 'json',
                'data': {s : words}
            })
            .done(function(response){//script que traz os resultados do banco de dados
                $('.results').html('');

                $.each(response, function(key, val){
                    $('.results').append('<div class="item">' + val + '</div>');
                })
            })

            .fail(function(){//script que traz os dados vazios caso não tenha no banco
                $('.results').html('');
            })
        }else{
            $('.results').html('');
        }
    })
})