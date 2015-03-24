angular.module('categories.bookmarks.create', ['models.categories', 'models.bookmarks'])
    .config(function($stateProvider) {
        $stateProvider
            .state('eggly.categories.bookmarks.create', {
                url: '/bookmarks/create/',
                templateUrl: 'app/categories/bookmarks/create/bookmarks-create.html',
                controller: 'CreateBookmarkCtrl as createBookmarkCtrl'
            })
    })
.controller('CreateBookmarkCtrl', function (BookmarksModel, $state, $stateParams, CategoriesModel, $http)
    {
        var createBookmarkCtrl = this;

        function returnToBookmarks()
        {
            $state.go('eggly.categories.bookmarks', {
                category: $stateParams.category
            })
        }

        createBookmarkCtrl.cancelCreating = function ()
        {
            returnToBookmarks();
        };

        createBookmarkCtrl.createBookmark = function (newBookmark)
        {
            newBookmark.id_category = CategoriesModel.getCurrentCategory().id;
            $http.post('http://localhost/Project3WA/EgglyAPIAngular/CodeIgniter3/index.php/Bookmarks', newBookmark)
                .then(function(results)
                {
                    BookmarksModel.addBookmark(results.data);
                    returnToBookmarks();
                })

        };

    });