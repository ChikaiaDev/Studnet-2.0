  var keystone = require('keystone');
  var Types = keystone.Field.Types;

  var Railwayjob = new keystone.List('Railwayjob',{
    map: {name:'title'},
    singular: 'Railwayjob',
    plural:'Railwayjobs',
    autokey: {path: 'slug', from: 'title', unique: true}
  });

  Railwayjob.add({

    title: {type: String, required: true},
    boardName: {type: String},
    publishedDate: {type: String},
    lastDate: {type: String },
    downloadHallticketDate:{type:String},
    examDate: {type: String},
    advtNo:{type: String},
    qualificationShortDetails:{type: String},
    qualification: {type: String},
    ageLimit: {type: String},
    selectionProcess:{type: String},
    applicationFee:{type: String},
    totalPost: {type: Number},
    applicationLink: {type: String},
    postCategories: { type: Types.Html, wysiwyg: true, height: 150 },
    howToApply:{type: String},
    aboutJob: { type: Types.Html, wysiwyg: true, height: 150 },
    instructionsHowToApply: { type: Types.Html, wysiwyg: true, height: 400 },

  });

  Railwayjob.register();
