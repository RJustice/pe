chrome.runtime.onInstalled.addListener(function() {
  chrome.declarativeContent.onPageChanged.removeRules(undefined, function() {
	    chrome.declarativeContent.onPageChanged.addRules([
	      {
	        conditions: [
	          new chrome.declarativeContent.PageStateMatcher({
	            pageUrl: { hostEquals: 'item.taobao.com'},
	          }),
	          new chrome.declarativeContent.PageStateMatcher({
		  pageUrl: {hostEquals: 'trade.taobao.com' , urlContains:'trade_item_detail'},
	          }),
	          new chrome.declarativeContent.PageStateMatcher({
		  pageUrl: {hostEquals: 'item.tbsandbox.com'},
	          }),
	          new chrome.declarativeContent.PageStateMatcher({
		  pageUrl: {hostEquals: 'trade.tbsandbox.com',urlContains:'trade_item_detail'},
	          }),
	        ],
	        actions: [ new chrome.declarativeContent.ShowPageAction() ]
	      }
	    ]);
	  });
	});