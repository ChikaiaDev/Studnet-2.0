var keystone = require('keystone');

exports = module.exports = function(req, res){
  var view = new keystone.View(req, res);
  var locals = res.locals;

  locals.section = 'itjob';
  locals.filters = {
    itjob: req.params.itjob
  }
  locals.data = {
    itjobs:[]
  }
  //load jobs
  view.on('init', function(next){
    var q = keystone.list('Itjob').model.findOne({
      slug: locals.filters.itjob
    });

    q.exec(function(err, result){
      locals.data.itjob = result;
      next(err);
    });
  });
  //Render view
  view.render('itjob');
}
