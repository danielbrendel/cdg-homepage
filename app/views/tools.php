<div class="columns">
	<div class="column is-2"></div>

	<div class="column is-8 is-vertical-margin">
		<div class="content-padding">
			<h2 class="is-font-headline">Tools</h2>

            <p>
                Casual Desktop game features dynamic so called tools which you can use in the game.
                Tools are for instance weapons, vehicles, monsters, etc. 
            </p>

            <p>
                Casual Desktop Game offers the possibility to load tools dynamically, so you can dynamically
                add more tools to your game. Tools are coded in AngelScript.
            </p>

            <p>
                This page gives information about all the official standard tools, both officially included and 
                official Workshop tools.
            </p>

            <div class="paragraph">
                <h3>Officially included tools</h3>

                <div class="tool-item"><span>&#9679;</span> <a href="#aircraft">Aircraft</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#ballista">Ballista</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#bazooka">Bazooka</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#bee">Bee</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#boltwand">Boltwand</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#bomb">Bomb</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#chainsaw">Chainsaw</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#colorgun">Colorgun</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#fireworks">Fireworks</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#flamethrower">Flamethrower</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#gunner">Gunner</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#hammer">Hammer</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#headcrab">Headcrab</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#helicopter">Helicopter</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#hhg">Holy Handgrenade</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#lasergun">Lasergun</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#lasermech">Lasermech</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#meteor">Meteorshower</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#mp5">MP5</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#nuke">Nuke</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#pistol">Pistol</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#rlauncher">Rocket launcher</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#satellite">Satellite</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#sniper">Sniper</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#soldier">Soldier</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#stamp">Stamp</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#tank">Tank</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#tcdualgun">TC Dualgun</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#tcheavy">TC Heavy</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#tclight">TC Light</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#teslatower">Teslatower</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#wand">Wand</a></div>
            </div>

            <div class="paragraph">
                <h3>Official Workshop tools</h3>

                <div class="tool-item"><span>&#9679;</span> <a href="#alienfighter">Alien Fighter</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#aliengiant">Alien Giant</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#alieninfantry">Alien Infantry</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#frogator">Frogator</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#mine">Mine</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#molotov">Molotov</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#shotgun">Shotgun</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#sidelaser">Sidelaser</a></div>
                <div class="tool-item"><span>&#9679;</span> <a href="#wolfdragon">Wolfdragon</a></div>
            </div>

            <div class="paragraph">
                <h4>Legend</h4>

                <table>
                    <thead>
                        <tr></tr>
                        <tr></tr>
                    </thead>
                    <tbody>
                        <tr class="tr-colored">
                            <td><strong>Type</strong></td>
                            <td>The entity type. This is also the sorting category in game</td>
                        </tr>

                        <tr>
                            <td><strong>Spawnable</strong></td>
                            <td>If the entity will remain on the screen until it gets destroyed</td>
                        </tr>

                        <tr class="tr-colored">
                            <td><strong>Movable</strong></td>
                            <td>
                                If yes then you can control the entity and command it to move to a destination.
                                If not then it either moves around autonomously or it is a stationary entity.
                            </td>
                        </tr>
                    </tbody>
                </table>

                <hr/>
            </div>

            <div class="paragraph">
                <a name="aircraft"></a>
                <div class="paragraph">
                    <h4>Aircraft</h4>

                    <p>
                        <img src="{{ asset('img/previews/aircraft.png') }}"/>
                    </p>

                    <p>The aicraft is a rocket shooting airplane that flys around the screen and attacks nearby enemies</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-no">No</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="ballista"></a>
                <div class="paragraph">
                    <h4>Ballista</h4>

                    <p>
                        <img src="{{ asset('img/previews/ballista.png') }}"/>
                    </p>

                    <p>The ballista is a combat entity that shoots exploding arrows to enemies</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="bazooka"></a>
                <div class="paragraph">
                    <h4>Bazooka</h4>

                    <p>
                        <img src="{{ asset('img/previews/bazooka.png') }}"/>
                    </p>

                    <p>The bazooka is a weapon that shoots rockets to the position at the crosshair points to</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="bee"></a>
                <div class="paragraph">
                    <h4>Bee</h4>

                    <p>
                        <img src="{{ asset('img/previews/bee.png') }}"/>
                    </p>

                    <p>When triggered the bee flys from left to right and drops six bombs</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="boltwand"></a>
                <div class="paragraph">
                    <h4>Boltwand</h4>

                    <p>
                        <img src="{{ asset('img/previews/boltwand.png') }}"/>
                    </p>

                    <p>The boltwand is a weapon that emits a lightning bolt to the position the crosshair points to</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="bomb"></a>
                <div class="paragraph">
                    <h4>Bomb</h4>

                    <p>
                        <img src="{{ asset('img/previews/bomb.png') }}"/>
                    </p>

                    <p>After being dropped, the bomb fuses and then explodes causing damage to nearby objects</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="chainsaw"></a>
                <div class="paragraph">
                    <h4>Chainsaw</h4>

                    <p>
                        <img src="{{ asset('img/previews/chainsaw.png') }}"/>
                    </p>

                    <p>The chainsaw causes damage to the position it is used to.</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="colorgun"></a>
                <div class="paragraph">
                    <h4>Colorgun</h4>

                    <p>
                        <img src="{{ asset('img/previews/colorgun.png') }}"/>
                    </p>

                    <p>The colorgun shoots causes color splashes to where it shoots. The colors vary from different possible colors</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="fireworks"></a>
                <div class="paragraph">
                    <h4>Fireworks</h4>

                    <p>
                        <img src="{{ asset('img/previews/fireworks.png') }}"/>
                    </p>

                    <p>The fireworks tool just spawns some fireworks that explode on the position that is pointed to. It's just a visual tool</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Visual</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="flamethrower"></a>
                <div class="paragraph">
                    <h4>Flamethrower</h4>

                    <p>
                        <img src="{{ asset('img/previews/flamethrower.png') }}"/>
                    </p>

                    <p>
                        The flamethrower emits fire that moves towards the direction where it is pointed to and then will
                        remain at the given position for a while until it extinguishes. Colliding objects will recieve damage
                        as long as they collide with the fire spawn.
                    </p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="gunner"></a>
                <div class="paragraph">
                    <h4>Gunner</h4>

                    <p>
                        <img src="{{ asset('img/previews/gunner.png') }}"/>
                    </p>

                    <p>The gunner is a stationary defensive military system that shoots bullets to approaching enemies</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-no">No</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="hammer"></a>
                <div class="paragraph">
                    <h4>Hammer</h4>

                    <p>
                        <img src="{{ asset('img/previews/hammer.png') }}"/>
                    </p>

                    <p>The hammer can be used to smash the screen and cause damage to hit objects</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Tools</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="headcrab"></a>
                <div class="paragraph">
                    <h4>Headcrab</h4>

                    <p>
                        <img src="{{ asset('img/previews/headcrab.png') }}"/>
                    </p>

                    <p>
                        Who doesn't like these cuddly aliens from the Xen dimension? Well, at least if they approach you to
                        jump on your head and want to turn you into a zombie. These little aliens are upgraded and do even attack
                        vehicles. They are most dangerous when working as a swarm.
                    </p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Monster</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-no">No</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="helicopter"></a>
                <div class="paragraph">
                    <h4>Helicopter</h4>

                    <p>
                        <img src="{{ asset('img/previews/helicopter.png') }}"/>
                    </p>

                    <p>The helicopter is a combat entity that shoots missiles to opponent targets.</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="hhg"></a>
                <div class="paragraph">
                    <h4>Holy Handgranade</h4>

                    <p>
                        <img src="{{ asset('img/previews/hhg.png') }}"/>
                    </p>

                    <p>Well-known from the Worms franchise or Monty Python, this deadly weapon does cause some real huge damage</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="lasergun"></a>
                <div class="paragraph">
                    <h4>Lasergun</h4>

                    <p>
                        <img src="{{ asset('img/previews/lasergun.png') }}"/>
                    </p>

                    <p>The laser gun just shoots laser bullets to where the crosshair points to</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="lasermech"></a>
                <div class="paragraph">
                    <h4>Lasermech</h4>

                    <p>
                        <img src="{{ asset('img/previews/lasermech.png') }}"/>
                    </p>

                    <p>The laser mech is a very strong combat entity that is even more dangerous when in squads.</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="meteor"></a>
                <div class="paragraph">
                    <h4>Meteorshower</h4>

                    <p>
                        <img src="{{ asset('img/previews/meteor.png') }}"/>
                    </p>

                    <p>This natural disaster will let many meteors drop down to the screen around where it is pointed to.</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="mp5"></a>
                <div class="paragraph">
                    <h4>MP5</h4>

                    <p>
                        <img src="{{ asset('img/previews/mp5.png') }}"/>
                    </p>

                    <p>The MP5 is a machine gun that shoots projectile bullets to where the crosshair points to</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="nuke"></a>
                <div class="paragraph">
                    <h4>Nuke</h4>

                    <p>
                        <img src="{{ asset('img/previews/nuke.png') }}"/>
                    </p>

                    <p>No one can escape the nuclear strike. When triggered every entity on the screen should get out as fast as possible...</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="pistol"></a>
                <div class="paragraph">
                    <h4>Pistol</h4>

                    <p>
                        <img src="{{ asset('img/previews/pistol.png') }}"/>
                    </p>

                    <p>The pistol is a light weapon that shoots projectile bullets to where the crosshair points to</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="rlauncher"></a>
                <div class="paragraph">
                    <h4>Rocket launcher</h4>

                    <p>
                        <img src="{{ asset('img/previews/rlauncher.png') }}"/>
                    </p>

                    <p>
                        The rocket launcher is a combat entity that shoots missiles to target opponents causing strong damage. The entity itself
                        has heavy armory.
                    </p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="satellite"></a>
                <div class="paragraph">
                    <h4>Satellite</h4>

                    <p>
                        <img src="{{ asset('img/previews/satellite.png') }}"/>
                    </p>

                    <p>
                        When triggered a satellite will fly above the position it is pointed to and emit a lightning strike to where
                        the crosshair points to.
                    </p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="sniper"></a>
                <div class="paragraph">
                    <h4>Sniper</h4>

                    <p>
                        <img src="{{ asset('img/previews/sniper.png') }}"/>
                    </p>

                    <p>The sniper shoots a projectile to where the crosshair points to causing strong damage.</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="soldier"></a>
                <div class="paragraph">
                    <h4>Soldier</h4>

                    <p>
                        <img src="{{ asset('img/previews/soldier.png') }}"/>
                    </p>

                    <p>This infantry combat entity will attack nearby enemies with their machine gun</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="stamp"></a>
                <div class="paragraph">
                    <h4>Stamp</h4>

                    <p>
                        <img src="{{ asset('img/previews/stamp.png') }}"/>
                    </p>

                    <p>Stamp the screen with nice meme stamps and squash everything it hits</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Tool</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="tank"></a>
                <div class="paragraph">
                    <h4>Tank</h4>

                    <p>
                        <img src="{{ asset('img/previews/tank.png') }}"/>
                    </p>

                    <p>The tank will move around on the screen and shoot to random directions damaging everything in attack range</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-no">No</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="tcdualgun"></a>
                <div class="paragraph">
                    <h4>TC Dualgun</h4>

                    <p>
                        <img src="{{ asset('img/previews/tcdualgun.png') }}"/>
                    </p>

                    <p>This kinda mammoth tank is a combat entity with strong armory and strong damage causing.</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="tcheavy"></a>
                <div class="paragraph">
                    <h4>TC Heavy</h4>

                    <p>
                        <img src="{{ asset('img/previews/tcheavy.png') }}"/>
                    </p>

                    <p>It does have heavy armory, but it does not cause as much damage as the TC dualgun</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="tclight"></a>
                <div class="paragraph">
                    <h4>TC Light</h4>

                    <p>
                        <img src="{{ asset('img/previews/tclight.png') }}"/>
                    </p>

                    <p>The light TC tank. It does have light armory and causes the least damage compared to other TC combat entities.</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="teslatower"></a>
                <div class="paragraph">
                    <h4>Teslatower</h4>

                    <p>
                        <img src="{{ asset('img/previews/teslatower.png') }}"/>
                    </p>

                    <p>The teslatower is a stationary defensive entity that emits lightning strikes to approaching enemies.</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-no">No</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="wand"></a>
                <div class="paragraph">
                    <h4>Wand</h4>

                    <p>
                        <img src="{{ asset('img/previews/wand.png') }}"/>
                    </p>

                    <p>The wand spawns a magic plasma ball that heads to where the crosshair points to and explodes causing damage</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="alienfighter"></a>
                <div class="paragraph">
                    <h4>Alien Fighter</h4>

                    <p>
                        <img src="{{ asset('img/previews/alienfighter.png') }}"/>
                    </p>

                    <p>The alien fighter is an alien ship combat entity that shoots lasers</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="aliengiant"></a>
                <div class="paragraph">
                    <h4>Alien Giant</h4>

                    <p>
                        <img src="{{ asset('img/previews/aliengiant.png') }}"/>
                    </p>

                    <p>This alien mother ship should be avoided by weaker entities. It causes massive damage with different weapons.</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="alieninfantry"></a>
                <div class="paragraph">
                    <h4>Alien Infantry</h4>

                    <p>
                        <img src="{{ asset('img/previews/alieninfantry.png') }}"/>
                    </p>

                    <p>This alien infantry can walk around and shoot rockets at opponents</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Military</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="frogator"></a>
                <div class="paragraph">
                    <h4>Frogator</h4>

                    <p>
                        <img src="{{ asset('img/previews/frogator.png') }}"/>
                    </p>

                    <p>The frogator is a frog-like monster mutant that is armed with a trident that emits lightning strikes</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Monster</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-no">No</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="mine"></a>
                <div class="paragraph">
                    <h4>Mine</h4>

                    <p>
                        <img src="{{ asset('img/previews/mine.png') }}"/>
                    </p>

                    <p>The mine will be activated if an entity comes too close and will then detonate after a few moments</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-no">No</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="molotov"></a>
                <div class="paragraph">
                    <h4>Molotov</h4>

                    <p>
                        <img src="{{ asset('img/previews/molotov.png') }}"/>
                    </p>

                    <p>The molotov can be thrown onto the screen and will create damage in a given area</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="shotgun"></a>
                <div class="paragraph">
                    <h4>Shotgun</h4>

                    <p>
                        <img src="{{ asset('img/previews/shotgun.png') }}"/>
                    </p>

                    <p>The shotgun is a weapon that fires multiple bullets and causes much damage</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="sidelaser"></a>
                <div class="paragraph">
                    <h4>Sidelaser</h4>

                    <p>
                        <img src="{{ asset('img/previews/sidelaser.png') }}"/>
                    </p>

                    <p>When launched a sidelaser on left and right of the screen moves from up to down and shoots lasers a few times</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Weapon</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-no">No</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>

                <a name="wolfdragon"></a>
                <div class="paragraph">
                    <h4>Wolfdragon</h4>

                    <p>
                        <img src="{{ asset('img/previews/wolfdragon.png') }}"/>
                    </p>

                    <p>The wolfdragon is a monster mutant that can shoot multiple laser bullets to opponents</p>

                    <table>
                        <thead>
                            <tr></tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr class="tr-colored">
                                <td><strong>Type</strong></td>
                                <td>Monster</td>
                            </tr>

                            <tr>
                                <td><strong>Spawnable</strong></td>
                                <td class="td-yes">Yes</td>
                            </tr>

                            <tr class="tr-colored">
                                <td><strong>Movable</strong></td>
                                <td class="td-no">No</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr/>
                </div>
            </div>

            <div class="scroll-to-top">
		        <div class="scroll-to-top-inner">
			        <a href="javascript:void(0);" onclick="window.scroll({top: 0, left: 0, behavior: 'smooth'});"><i class="fas fa-arrow-up fa-2x up-color"></i></a>
		        </div>
	        </div>
        </div>
	</div>

	<div class="column is-2"></div>
</div>