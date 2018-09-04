# Weather

基于 高德开放平台 的 PHP 天气信息组件。  
[![Build Status](https://travis-ci.org/phper2007/weather.svg?branch=master)](https://travis-ci.org/phper2007/weather)
![StyleCI build status](https://github.styleci.io/repos/147303200/shield) 

## 安装


	$ composer require phper2007/weather -vvv


## 配置
在使用本扩展之前，你需要去 [高德开放平台](https://lbs.amap.com/dev/id/newuser) 注册账号，然后创建应用，获取应用的 API Key。

## 使用

    use Phper2007\Weather\Weather;
	
	$key = 'xxxxxxxxxxxxxxxxxxx';

	$weather = new Weather($key);

## 获取实时天气

	$response = $weather->getWeather('深圳');

示例：

	{
	    "status": "1",
	    "count": "1",
	    "info": "OK",
	    "infocode": "10000",
	    "lives": [{
	        "province": "广东",
	        "city": "深圳市",
	        "adcode": "440300",
	        "weather": "多云",
	        "temperature": "28",
	        "winddirection": "西南",
	        "windpower": "6",
	        "humidity": "83",
	        "reporttime": "2018-09-03 16:00:00"
	    }]
	}

## 获取天气预报
	$response = $weather->getWeather('深圳', 'all');

示例：

	{
	    "status": "1",
	    "count": "1",
	    "info": "OK",
	    "infocode": "10000",
	    "forecasts": [{
	        "city": "深圳市",
	        "adcode": "440300",
	        "province": "广东",
	        "reporttime": "2018-09-03 18:00:00",
	        "casts": [{
	            "date": "2018-09-03",
	            "week": "1",
	            "dayweather": "阵雨",
	            "nightweather": "多云",
	            "daytemp": "31",
	            "nighttemp": "27",
	            "daywind": "无风向",
	            "nightwind": "无风向",
	            "daypower": "≤3",
	            "nightpower": "≤3"
	        }, {
	            "date": "2018-09-04",
	            "week": "2",
	            "dayweather": "多云",
	            "nightweather": "阵雨",
	            "daytemp": "32",
	            "nighttemp": "27",
	            "daywind": "无风向",
	            "nightwind": "无风向",
	            "daypower": "≤3",
	            "nightpower": "≤3"
	        }, {
	            "date": "2018-09-05",
	            "week": "3",
	            "dayweather": "阵雨",
	            "nightweather": "阵雨",
	            "daytemp": "32",
	            "nighttemp": "27",
	            "daywind": "无风向",
	            "nightwind": "无风向",
	            "daypower": "≤3",
	            "nightpower": "≤3"
	        }, {
	            "date": "2018-09-06",
	            "week": "4",
	            "dayweather": "阵雨",
	            "nightweather": "雷阵雨",
	            "daytemp": "31",
	            "nighttemp": "27",
	            "daywind": "无风向",
	            "nightwind": "无风向",
	            "daypower": "≤3",
	            "nightpower": "≤3"
	        }]
	    }]
	}

## 获取XML格式返回值

第三个参数为返回类型值，可选 ```json``` 与 ```xml``` ，默认 ```json```：

	$response = $weather->getWeather('深圳', 'all', 'xml');

示例：

	<response>
	    <status>1</status>
	    <count>1</count>
	    <info>OK</info>
	    <infocode>10000</infocode>
	    <forecasts type="list">
	        <forecast>
	            <city>深圳市</city>
	            <adcode>440300</adcode>
	            <province>广东</province>
	            <reporttime>2018-09-03 18:00:00</reporttime>
	            <casts type="list">
	                <cast>
	                    <date>2018-09-03</date>
	                    <week>1</week>
	                    <dayweather>阵雨</dayweather>
	                    <nightweather>多云</nightweather>
	                    <daytemp>31</daytemp>
	                    <nighttemp>27</nighttemp>
	                    <daywind>无风向</daywind>
	                    <nightwind>无风向</nightwind>
	                    <daypower>≤3</daypower>
	                    <nightpower>≤3</nightpower>
	                </cast>
	                <cast>
	                    <date>2018-09-04</date>
	                    <week>2</week>
	                    <dayweather>多云</dayweather>
	                    <nightweather>阵雨</nightweather>
	                    <daytemp>32</daytemp>
	                    <nighttemp>27</nighttemp>
	                    <daywind>无风向</daywind>
	                    <nightwind>无风向</nightwind>
	                    <daypower>≤3</daypower>
	                    <nightpower>≤3</nightpower>
	                </cast>
	                <cast>
	                    <date>2018-09-05</date>
	                    <week>3</week>
	                    <dayweather>阵雨</dayweather>
	                    <nightweather>阵雨</nightweather>
	                    <daytemp>32</daytemp>
	                    <nighttemp>27</nighttemp>
	                    <daywind>无风向</daywind>
	                    <nightwind>无风向</nightwind>
	                    <daypower>≤3</daypower>
	                    <nightpower>≤3</nightpower>
	                </cast>
	                <cast>
	                    <date>2018-09-06</date>
	                    <week>4</week>
	                    <dayweather>阵雨</dayweather>
	                    <nightweather>雷阵雨</nightweather>
	                    <daytemp>31</daytemp>
	                    <nighttemp>27</nighttemp>
	                    <daywind>无风向</daywind>
	                    <nightwind>无风向</nightwind>
	                    <daypower>≤3</daypower>
	                    <nightpower>≤3</nightpower>
	                </cast>
	            </casts>
	        </forecast>
	    </forecasts>
	</response>

## 参数说明

	array | string	getWeather(string $city, string $type = 'base', string $format = 'json')

	- $city - 城市名，比如“深圳”
	- $type - 返回的格式类型：```base```：返回实况天气/```all```：返回预报天气
	- $format － 输出的数据格式，默认为json格式，当output设置为"```xml```"时，输出的为XML格式的数据。
	

## 在Laravel中使用
在Laravel中使用也是同样的安装方式，配置写在```config/services.php```中：

		.
		.
		.
		'weather' => [
			'key' => evn('WEATHER_API_KEY'),
		],
然后在```.env```中配置```WEATHER_API_KEY```：

	WEATHER_API_KEY=xxxxxxxxxxxxxxx

可以用两种方式来获取```Phper2007\Weather\Weather``` 实例：
### 方法参数注入
	 	.
	    .
	    .
	    public function edit(Weather $weather) 
	    {
	        $response = $weather->getWeather('深圳');
	    }
	    .
	    .
	    .
### 服务名访问
	    .
	    .
	    .
	    public function edit() 
	    {
	        $response = app('weather')->getWeather('深圳');
	    }
	    .
	    .
	    .
## 参考
- [高德开放平台天气接口](https://lbs.amap.com/api/webservice/guide/api/weatherinfo/)

## License
MIT