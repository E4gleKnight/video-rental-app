/**
 * Created by Samuel Besnier on 05/07/2017.
 */



$(document).ready(function() {

    var $containerMovie = $('div#modelbundle_artist_moviesActedIn');

    var indexMovie = $containerMovie.find(':input').length;

    $('#add_movie').click(function(e) {
        addActor($containerMovie);

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    if (indexMovie == 0) {
        addMovie($containerMovie);
    } else {
        $containerMovie.children('div').each(function() {
            addDeleteLinkMovie($(this));
        });
    }

    function addMovie($container) {

        var template = $container.attr('data-prototype')
            .replace(/__name__label__/g, 'Movie n°' + (indexMovie+1))
            .replace(/__name__/g,        indexMovie)
        ;

        var $prototype = $(template);

        addDeleteLinkMovie($prototype);

        $containerMovie.append($prototype);

        indexMovie++;
    }

    function addDeleteLinkMovie($prototype) {

        var $deleteLink = $('<a href="#" class="btn btn-danger delete-btn">Supprimer</a>');

        $prototype.append($deleteLink);

        $deleteLink.click(function(e) {
            if (indexMovie != 1) {
                $prototype.remove();
                indexMovie--;
            }

            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
    }
});