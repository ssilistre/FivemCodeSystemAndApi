-----------------------------------------------
--İlk kurulum için panel.fivemcode.com sunucu kaydettikten sonra  lütfen aşağıya keyinizi yazınız.
--------------------------------------------------
local sunucuno = 'sunucuno'
--eğer kendi api sisteminizi kullanıcaksanız fivem.site yazan yerlere iplerinizi koyun.

----------------------------------------------------
------MESAJLAR-------------------------------------
local oyundaMesaji='Kullanıcı şu anda oyunda !'
local banlandinMesaji='Banlısın ama ballı değilsin.'
local luncheryokMesaji='Kanka luanchersız nereye giriyorsun.'


----------------------------------------------------

----------------------------------------------------

local function OnPlayerConnecting(name, setKickReason, deferrals)
    deferrals.defer()
    deferrals.update(string.format("Merhaba %s. Launcher kontrolü sağlanıyor...", name))
	identifiers = GetPlayerIdentifiers(source)
	local hex = identifiers[1]
	Wait(5)
	PerformHttpRequest('http://fivem.site/api/kontrol.php?sunucuid='..sunucuno..'&steamhexid='..hex..'', function(err, text, headers)
	local sonuc = text
	if sonuc == "Oyunda" then
		deferrals.done(oyundaMesaji)
	elseif sonuc == "4" then
		deferrals.done(banlandinMesaji)
	elseif sonuc == "1" then
		PerformHttpRequest('http://fivem.site/api/guncelle.php?sunucuid='..sunucuno..'&steamhexid='..hex..'&durum=0&online=1', function(err, text2, headers)
		end, 'GET', "")
		deferrals.done()
	elseif sonuc == "0" then
		deferrals.done(luncheryokMesaji)
	else
		deferrals.done(luncheryokMesaji)
	end
	end, 'GET', "")
  
end



local function OnPlayerDrop(name)
	
	local hex = identifiers[1]
    
	PerformHttpRequest('http://fivem.site/api/guncelle.php?sunucuid='..sunucuno..'&steamhexid='..hex..'&durum=0&online=0', function (errorCode, resultData, resultHeaders)
	  end)
	
end


AddEventHandler("playerConnecting", OnPlayerConnecting)
AddEventHandler("playerDropped", OnPlayerDrop)


