/**
 * Created by Samuel Besnier on 05/07/2017.
 */


$(document).ready(function() {
    var $container = $('div#modelbundle_movie_actors');

    var index = $container.find(':input').length;

    $('#add_actor').click(function(e) {
        addActor($container);

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    if (index == 0) {
        addActor($container);
    } else {
        $container.children('div').each(function() {
            addDeleteLink($(this));
        });
    }

    function addActor($container) {

        var template = $container.attr('data-prototype')
            .replace(/__name__label__/g, 'Catégorie n°' + (index+1))
            .replace(/__name__/g,        index)
        ;

        var $prototype = $(template);

        addDeleteLink($prototype);

        $container.append($prototype);

        index++;
    }

    function addDeleteLink($prototype) {

        var $deleteLink = $('<a href="#" class="btn btn-danger delete-btn">Supprimer</a>');

        $prototype.append($deleteLink);

        $deleteLink.click(function(e) {
            if (index != 1) {
                $prototype.remove();
                index--;
            }

            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
    }
});