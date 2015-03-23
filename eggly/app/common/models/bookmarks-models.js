angular.module('models.bookmarks', [])
    .service('BookmarksModel', function($http) {
        var model = this;

        model.getBookmarks = function ()
        {
            return $http.get('http://localhost/Project3WA/EgglyAPIAngular/CodeIgniter3/index.php/Bookmarks');
        };

        model.postBookmarks = function ()
        {
            return $http.post('http://localhost/Project3WA/EgglyAPIAngular/CodeIgniter3/index.php/Bookmarks');
        };

        model.putBookmark = function ()
        {
            return $http.put('http://localhost/Project3WA/EgglyAPIAngular/CodeIgniter3/index.php/Bookmarks/');
        };

        model.deleteBookmark = function ()
        {
            return $http.delete('http://localhost/Project3WA/EgglyAPIAngular/CodeIgniter3/index.php/Bookmarks/');
        };
    });