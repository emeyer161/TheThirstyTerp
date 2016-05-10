** CLEAN CODE IS YOUR GOAL **

DONE -- Create a fresh Laravel installation
DONE -- Enable Authentication using the default scaffolding
DONE -- Add Whoops and Debugbar
DONE -- Advance your base layout using the files that Laravel generated for you in the previous step
DONE -- Twitter Bootstrap is given to you here
	http://getbootstrap.com/2.3.2/getting-started.html#examples
DONE -- Create a public and private sections to your site with different look/feel
	One public and one admin panel site
DONE -- Install gulp Less stuff
    npm install, nav through files and make it work
    @import "../../../node_modules/bootstrap-less/bootstrap/index"
DONE -- Overwrite a bootstrap Less variable
    @primaryColor: #ccc;
    @secondaryColor: #ababab;
DONE -- bootstrap my forms
DONE -- button group my buttons
DONE -- Forms method spoofing
DONE -- fix id - slug descrepency
DONE -- fix always error flash
DONE -- refill forms "withInput()"
DONE -- auth->user instead of passing with form
DONE -- consolidate partials (ie. form builder etc.) ** abstraction **
DONE -- delete confirmation (maybe: http://www.w3schools.com/js/tryit.asp?filename=tryjs_prompt)

form request object (rules, authorization)
	DONE -- middleware
	policies
	DONE -- authServiceProvider
	DONE -- controller
	repo
	roles groups permissions policies tenants
		superadmin, admin, editor, writer, reader
	soft delete based on specific roles






$data = $request->all();
$data->user_id = Auth::id();


DONT --start adding React back in (2 separate apps)