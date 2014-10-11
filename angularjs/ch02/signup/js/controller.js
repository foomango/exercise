function AddUserController($scope) {
    $scope.message = '';
    // TODO for the reader: actually save the user to database...
    $scope.addUser = function() {
        $scope.message = 'Thanks, ' + $scope.user.first + ', we added you!';
    }
}
