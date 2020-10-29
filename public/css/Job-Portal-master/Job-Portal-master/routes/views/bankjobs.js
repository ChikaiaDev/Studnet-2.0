var keystone = require('keystone');

exports = module.exports = function(req, res){
  var view = new keystone.View(req, res);
  var locals = res.locals;

  locals.section = 'bankjob';
  //load jobs
  view.query('bankjobs', keystone.list('Bankjob').model.find());
  //Render view
  view.render('bankjobs');
}
