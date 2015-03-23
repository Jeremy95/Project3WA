angular.module("categories.bookmarks.edit", [])
    .config(function ($stateProvider){
        $stateProvider
            .state('eggly.categories.bookmarks.edit', {
                url: '/bookmarks/:bookmarkId/edit',
                templateUrl: 'app/categories/bookmarks/edit/bookmarks-edit.html',
                controller: "EditBookmarksCtrl as editBookmarksCtrl"
            });
    })
    .controller('EditBookmarksCtrl', function($state, $stateParams) {

        var editBookmarksCtrl = this;
        editBookmarksCtrl.returnToBookmarks = function ()
        {
            $state.go("eggly.categories.bookmarks", {
                category: $stateParams.category
            })
        };

        editBookmarksCtrl.cancelEditing = function (){
            editBookmarksCtrl.returnToBookmarks();
        };
    });
