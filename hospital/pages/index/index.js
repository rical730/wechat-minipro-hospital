//index.js
//获取应用实例
const app = getApp()

Page({
  data: {
    motto: 'Hello World',
    userInfo: {},
    hasUserInfo: false,
    canIUse: wx.canIUse('button.open-type.getUserInfo'),
    uname:null,
    uid:null,
    isSick:null,
    remark:null,
    radio_items: [
      { name: '1', value: '是' },
      { name: '0', value: '否' },
    ]
  },
  //事件处理函数
  bindViewTap: function() {
    // wx.navigateTo({
    //   url: '../logs/logs'
    // })
  },

  unameInput:function(e) {
    // console.log("uname:", e.detail.value)
    this.setData({uname:e.detail.value})
  },

  uidInput: function (e) {
    // console.log("uid:", e.detail.value)
    this.setData({ uid: e.detail.value })
  },

  radioChange: function (e) {
    // console.log('radio发生change事件，携带value值为：', e.detail.value)
    this.setData({ isSick: e.detail.value })
  },

  remarkInput: function (e) {
    // console.log("remark:", e.detail.value)
    this.setData({ remark: e.detail.value })
  },

  btnClick:function() {
    wx.request({
      url: 'https://4*******03.mylightsite.com/hospitalBack/receivedata.php',   //需要改成自己的服务器域名！！！！！！！！！！！！！
      data: {
        a: this.data.uname,
        b: this.data.uid,
        c: this.data.isSick,
        d: this.data.remark,
        e: this.data.userInfo.nickName
      },
      header: {
        'content-type': 'application/json' // 默认值
      },
      success: function (res) {
        // console.log(res.data)
        if(res.data == "1201"){
          wx.redirectTo({
            url: '../success/success'
          })
        }else{
          wx.navigateTo({
            url: '../fail/fail'
          })
          // app.globalData.errInfo = url
          console.log(res);
        }
      }
    })
  },

  onLoad: function () {
    if (app.globalData.userInfo) {
      this.setData({
        userInfo: app.globalData.userInfo,
        hasUserInfo: true
      })
    } else if (this.data.canIUse){
      // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
      // 所以此处加入 callback 以防止这种情况
      app.userInfoReadyCallback = res => {
        this.setData({
          userInfo: res.userInfo,
          hasUserInfo: true
        })
      }
    } else {
      // 在没有 open-type=getUserInfo 版本的兼容处理
      wx.getUserInfo({
        success: res => {
          app.globalData.userInfo = res.userInfo
          this.setData({
            userInfo: res.userInfo,
            hasUserInfo: true
          })
        }
      })
    }
  },
  getUserInfo: function(e) {
    console.log(e)
    app.globalData.userInfo = e.detail.userInfo
    this.setData({
      userInfo: e.detail.userInfo,
      hasUserInfo: true
    })
  }
})
