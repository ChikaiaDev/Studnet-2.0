var keystone = require('keystone');

exports = module.exports = function(req, res){
  var view = new keystone.View(req, res);
  var locals = res.locals;

  locals.section = 'bankjob';
  locals.filters = {
    bankjob: req.params.bankjob
  }
  locals.data = {
    bankjobs:[]
  }
  //load jobs
  view.on('init', function(next){
    var q = keystone.list('Bankjob').model.findOne({
      slug: locals.filters.bankjob
    });

    q.exec(function(err, result){
      locals.data.bankjob = result;
      next(err);
    });
  });
  //Render view
  view.render('bankjob');
}
