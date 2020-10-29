var keystone = require('keystone');

exports = module.exports = function(req, res){
  var view = new keystone.View(req, res);
  var locals = res.locals;

  locals.section = 'railwayjob';
  //load jobs
  view.query('railwayjobs', keystone.list('Railwayjob').model.find());
  //Render view
  view.render('railwayjobs');
}
