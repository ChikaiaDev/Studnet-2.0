var keystone = require('keystone');
var Types = keystone.Field.Types;

var Itjob = new keystone.List('Itjob',{
  map: {name:'title'},
  singular: 'Itjob',
  plural:'Itjobs',
  autokey: {path: 'slug', from: 'title', unique: true}
});

Itjob.add({

  title: {type: String, required: true},
  companyName: {type: String},
  experience: {type: String },
  education:{type: String},
  qualification: {type: String},
  industry:{type:String},
  location:{type:String},
  role:{type:String},
  salary:{type:Number},
  keySkills:{type:String},
  publishedDate: {type: String},
  walkInDate: {type: String },
  walkInTime: {type: String },
  walkInVenue: {type: String },
  companyWebsite:{type:String},
  applicationLink:{type:String},

  jobDescription: { type: Types.Html, wysiwyg: true, height: 150 },

});

Itjob.register();
