<h2>
    You're informations
</h2>
<form action="" method="post" id="addInfoUser">
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name...">
    </div>
    <div class="form-group">
        <label for="firstName">First name</label>
        <input name="firstName" type="text" class="form-control" id="firstName" placeholder="Enter firstname...">
    </div>
    <div class="form-group">
        <label for="birthdate">Birthdate</label>
        <input type="date" class="form-control" id="birthdate" name="birthdate">
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <input type="text" name="city" class="form-control" id="city">
    </div>
    <div class="form-group">
        <label for="country">Country</label>
        <input name="country" type="text" class="form-control" id="country" placeholder="Enter country...">
    </div>
    <div class="form-group">
        <label for="address">Shipp address</label>
        <input name="address" type="text" class="form-control" id="address" placeholder="Enter address...">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
</form>

<p style="display: none" id="infoCustomerError" class="alert alert-danger">
</p>
