angular.module('models.bookmarks', [])
    .service('BookmarksModel', function($http, $q) {
        var model = this;
        var bookmarks;

        model.getBookmarks = function ()
        {
            var deferred = $q.defer();
            if(bookmarks)
            {
                deferred.resolve(bookmarks);
            }
            else
            {
                $http.get('http://localhost/Project3WA/EgglyAPIAngular/CodeIgniter3/index.php/Bookmarks')
                    .then(function(results)
                    {
                        bookmarks = results.data;
                        deferred.resolve(bookmarks);
                    })
            }


            return deferred.promise;

        };

        model.addBookmark = function (bookmark)
        {
            bookmarks.push(bookmark);
        };

        model.deleteBookmark = function (bookmark)
        {
            for(var i = 0; i < bookmarks.length; i++)
            {
                if(bookmarks[i].id == bookmark.id)
                {
                    bookmarks.splice(i ,1);
                    break;
                }
            }
        }

    });