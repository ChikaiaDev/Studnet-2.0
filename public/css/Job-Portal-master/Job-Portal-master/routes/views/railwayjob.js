var keystone = require('keystone');

exports = module.exports = function(req, res){
  var view = new keystone.View(req, res);
  var locals = res.locals;

  locals.section = 'railwayjob';
  locals.filters = {
    railwayjob: req.params.railwayjob
  }
  locals.data = {
    railwayjobs:[]
  }
  //load jobs
  view.on('init', function(next){
    var q = keystone.list('Railwayjob').model.findOne({
      slug: locals.filters.railwayjob
    });

    q.exec(function(err, result){
      locals.data.railwayjob = result;
      next(err);
    });
  });
  //Render view
  view.render('railwayjob');
}
