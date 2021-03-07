const $puppeteer = require('puppeteer');

// 用户信息
const info = async (response) => {
    const url = new URL(await response.url());
    return Object.fromEntries(url.searchParams.entries());
}

// 视频信息
const video = async (response) => {
    const url = new URL(await response.url());
    return Object.fromEntries(url.searchParams.entries());
}

// 全局事件
const EVENTS = [
    { name: 'info', fun: info, url: 'https://www.iesdouyin.com/web/api/v2/user/info' },
    { name: 'video', fun: video, url: 'https://www.iesdouyin.com/web/api/v2/aweme/post' },
];

// 全局变量
let outputs = {};
let browser = null;

// 请求分发器
const dispatch = async (response) => {
    const url = response.url();
    for (let i = 0; i < EVENTS.length; i++) {
        const event = EVENTS[i];
        if (url.includes(event.url)) {

            outputs[event.name] = await event.fun(response);
            break;
        }
    }
}

const main = async (url) => {
    // 开启浏览器
    browser = await $puppeteer.launch();

    // 创建页面
    const page = await browser.newPage();

    // 分发任务
    page.on('response', dispatch);

    // 请求页面
    await page.goto(url, { waitUntil: 'networkidle2' });

    // 关闭浏览器
    await browser.close();

    console.log(JSON.stringify(outputs));
};

// 开启获取数据
const url = (process.argv[2]);
main(url);
