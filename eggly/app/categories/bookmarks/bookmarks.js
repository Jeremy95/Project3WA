angular.module('categories.bookmarks', ['models.bookmarks', 'categories.bookmarks.edit'])
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
    .controller('BookmarksCtrl', function(BookmarksModel) {

        var bookmarksCtrl = this;

        BookmarksModel.getBookmarks().then(function (results)
        {
            bookmarksCtrl.bookmarks = results.data;
        });


    });
