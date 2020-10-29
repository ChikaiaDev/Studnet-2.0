 // Simulate config options from your production environment by
// customising the .env file in your project's root folder.
require('dotenv').config();

// Require keystone
var app = require('keystone');
var handlebars = require('express-handlebars');

// Initialise Keystone with your project's configuration.
// See http://keystonejs.com/guide/config for available options
// and documentation.

app.init({
	'name': 'MyJob.com',
	'brand': 'MyJob.com',

	'sass': 'public',
	'static': 'public',
	'favicon': 'public/favicon.ico',
	'views': 'templates/views',
	'view engine': 'hbs',

	'custom engine': handlebars.create({
		layoutsDir: 'templates/views/layouts',
		partialsDir: 'templates/views/partials',
		defaultLayout: 'default',
		helpers: new require('./templates/views/helpers')(),
		extname: '.hbs',
	}).engine,



	'auto update': true,
	'session': true,
	'auth': true,
	'user model': 'User',
    'mongodb':  process.env.MONGO_URI || process.env.MONGOLAB_URI ,
	'cloudinary config': 'cloudinary://918826725878849:rvMzy6RPnV4UtG_9Ai_2Lib9oVk@myjob-com'

});

// Load your project's Models
app.import('models');

// Setup common locals for your templates. The following are required for the
// bundled templates and layouts. Any runtime locals (that should be set uniquely
// for each request) should be added to ./routes/middleware.js
app.set('locals', {
	_: require('lodash'),
	env: app.get('env'),
	utils: app.utils,
	editable: app.content.editable,
});

// Load your project's Routes
app.set('routes', require('./routes'));

// Switch Keystone Email defaults to handlebars
app.Email.defaults.templateExt = 'hbs';
app.Email.defaults.templateEngine = require('handlebars');


// Configure the navigation bar in  Admin UI
app.set('nav', {
	posts: ['posts', 'post-categories'],
	bankJob:'bankjobs',
	railwayJob:'railwayjobs',
	itJob:'itjobs',
	upscJob:'upscjobs',	
	govtJob:'govtjobs',
	enquiries: 'enquiries',
	users: 'users',

});



app.start();
