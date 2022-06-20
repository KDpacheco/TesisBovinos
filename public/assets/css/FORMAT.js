var oldExportAction = function (self, e, dt, button, config) {
  if (button[0].className.indexOf('buttons-excel') >= 0) {
    if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
      $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
    }
    else {
      $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
    }
  }
  else if (button[0].className.indexOf('buttons-print') >= 0) {
    $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
  }
};
var newExportAction = function (e, dt, button, config) {
  var self = this; var oldStart = dt.settings()[0]._iDisplayStart; dt.one('preXhr', function (e, s, data) {
    data.start = 0; data.length = 2147483647; dt.one('preDraw', function (e, settings) {
      oldExportAction(self, e, dt, button, config); dt.one('preXhr', function (e, s, data) {
        settings._iDisplayStart = oldStart; data.start = oldStart;
      }); setTimeout(dt.ajax.reload, 0); return false;
    });
  }); dt.ajax.reload();
};