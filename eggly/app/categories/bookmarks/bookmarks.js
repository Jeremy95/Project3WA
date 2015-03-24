angular.module('categories.bookmarks', ['models.bookmarks', 'models.categories', 'categories.bookmarks.edit', 'categories.bookmarks.create'])
    .config(function($stateProvider) {
        $stateProvider
            .state('eggly.categories.bookmarks', {
                url: 'categories/:category',
                views: {
                    'bookmarks@': {
                        templateUrl: "app/categories/bookmarks/bookmarks.html",
                        controller: 'BookmarksCtrl as bookmarksCtrl'
                    }
                }
            });
    })
    .controller('BookmarksCtrl', function($state, BookmarksModel, CategoriesModel, $stateParams, $http) {

        var bookmarksCtrl = this;

        CategoriesModel.setCurrentCategory($stateParams.category);

        BookmarksModel.getBookmarks().then(function (results)
        {
            bookmarksCtrl.bookmarks = results;
        });

        bookmarksCtrl.getCurrentCategoryName = CategoriesModel.getCurrentCategoryName;

        bookmarksCtrl.getCurrentCategory = CategoriesModel.getCurrentCategory;

        bookmarksCtrl.deleteBookmark = function (bookmark)
        {
            $http.delete('http://localhost/Project3WA/EgglyAPIAngular/CodeIgniter3/index.php/bookmarks/' + bookmark.id)
                .success(function (){

                        BookmarksModel.deleteBookmark(bookmark);

                });
        };



    });
