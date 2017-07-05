/**
 * Created by Samuel Besnier on 05/07/2017.
 */


$(document).ready(function() {
    var $containerActor = $('div#modelbundle_movie_actors');

    var indexActor = $containerActor.find(':input').length;

    $('#add_actor').click(function(e) {
        addActor($containerActor);

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    if (indexActor == 0) {
        addActor($containerActor);
    } else {
        $containerActor.children('div').each(function() {
            addDeleteLink($(this));
        });
    }

    function addActor($container) {

        var template = $container.attr('data-prototype')
            .replace(/__name__label__/g, 'Acteur n°' + (indexActor+1))
            .replace(/__name__/g,        indexActor)
        ;

        var $prototype = $(template);

        addDeleteLink($prototype);

        $container.append($prototype);

        indexActor++;
    }

    function addDeleteLink($prototype) {

        var $deleteLink = $('<a href="#" class="btn btn-danger delete-btn">Supprimer</a>');

        $prototype.append($deleteLink);

        $deleteLink.click(function(e) {
            if (indexActor != 1) {
                $prototype.remove();
                indexActor--;
            }

            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
    }
});