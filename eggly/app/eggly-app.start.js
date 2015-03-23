angular.module("Eggly", ["ui.router", "categories", "categories.bookmarks"])
    .config(function ($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('eggly',{
                url : '',
                abstract : true
            });
        $urlRouterProvider.otherwise('/');
    })
    .controller('MainCtrl', function($scope) {
        $scope.hello = "world";


        $scope.shouldShowCreating = function()
        {
            return $scope.currentCategory != null;

            /* même chose que :
             if ($scope.currentCategory != null)
             {
             return true;
             }
             else
             {
             return false;
             }
             */
        };

        $scope.states = function ()
        {
            isEditing = false;
            isCreating = false;
        };

        $scope.startCreating = function ()
        {
            return $scope.states.isCreating = true;
        };

        $scope.cancelCreating = function ()
        {
            return $scope.states.isCreating = false;
        };

        $scope.currentCategory = null;

        $scope.setCurrentCategory = function (category)
        {
            $scope.currentCategory = category;
        };

        $scope.isCurrentCategory = function (category)
        {
            return $scope.currentCategory == category;
        };

        $scope.showEditing = function (bookmark)
        {
            if($scope.states.isCreating)
            {
                $scope.states.isCreating = false;
            }

            $scope.states.isEditing = true;

            $scope.editedBookmark = angular.copy(bookmark);
        };

        $scope.cancelEditing = function ()
        {
            return $scope.states.isEditing = false;
        };

        $scope.editBookmark = function (editedBookmark)
        {
            for(var i = 0; i < $scope.bookmarks.length; i++)
            {
                if(editedBookmark.id == $scope.bookmarks[i].id)
                {
                    $scope.bookmarks[i] = editedBookmark;

                    $scope.cancelEditing();
                }


            }
        };

        $scope.removeBookmark = function (bookmark)
        {
            for(var i = 0; i < $scope.bookmarks.length; i++)
            {
                if(bookmark.id == $scope.bookmarks[i].id)
                    $scope.bookmarks.splice(i, 1);
            }
        };

        $scope.createBookmark = function (newBookmark)
        {
            newBookmark.category = $scope.currentCategory.name;

            newBookmark.id = $scope.bookmarks.length;

            $scope.bookmarks.push(newBookmark);
        };




    });